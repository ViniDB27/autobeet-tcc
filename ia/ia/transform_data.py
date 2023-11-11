import numpy as np
import tensorflow as tf
from sklearn.preprocessing import PowerTransformer

class TransformData:
    def __init__(self, window_size=500, overlap=0.15):
        """
        Inicializa a classe TransformData.

        Args:
            window_size (int): O tamanho da janela de segmentação.
            overlap (float): A taxa de sobreposição entre as janelas.

        """
        self.window_size = window_size
        self.overlap = overlap
        self.transformer = PowerTransformer(method='yeo-johnson', standardize=True)
    
    def overlapping_windows(self, data):
        """
        Divide os dados em janelas sobrepostas.

        Args:
            data (np.ndarray): O conjunto de dados de entrada.

        Returns:
            np.ndarray: Um array de janelas sobrepostas.

        """
        window_size = self.window_size
        overlap_size = int(window_size * self.overlap)
        step_size = window_size - overlap_size

        if step_size < 1:
            step_size = 1
        
        windows = []

        for i in range(0, data.shape[0] - window_size + 1, step_size):
            window = data[i:i + window_size, :]
            windows.append(window)
        
        return np.array(windows)

    def yeo_johnson_transform(self, data):
        """
        Aplica a transformação Yeo-Johnson aos dados.

        Args:
            data (np.ndarray): O conjunto de dados de entrada.

        Returns:
            np.ndarray: Os dados transformados.

        """
        shape_backup = data.shape
        data = data.reshape(-1, 1)
        data = self.transformer.fit_transform(data)
        data = data.reshape(shape_backup)
        return data
        
    def transformation_and_tensor(self, data):
        """
        Realiza a transformação dos dados e converte-os em um tensor TensorFlow.

        Args:
            data (np.ndarray): O conjunto de dados de entrada.

        Returns:
            tf.Tensor: Um tensor contendo os dados transformados.

        """
        data_windows = self.overlapping_windows(data)
        transformed_windows = []

        for window in data_windows:
            transformed_window = self.yeo_johnson_transform(window)
            transformed_windows.append(transformed_window)

        data_tensor = tf.convert_to_tensor(transformed_windows, dtype=tf.float32)
        return data_tensor
