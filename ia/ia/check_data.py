import pandas as pd
import numpy as np

SHAPE_DEFAULT = (500, 12)


class Check:
    def __init__(self):
        """
        Inicializa a classe Check.

        Atributos:
            returns_check (dict): Um dicionário para armazenar os resultados das verificações.

        """
        self.returns_check = {'is_csv': None, 'length': None, 'is_numeric': None}

    def check_file(self, file):
        """
        Verifica se o arquivo atende a critérios específicos.

        Args:
            file (str): O caminho para o arquivo CSV a ser verificado.

        Returns:
            dict: Um dicionário contendo os resultados das verificações.

        """
        # Verifica se o arquivo é CSV
        try:
            data = pd.read_csv(file)
            self.returns_check['is_csv'] = True
        except pd.errors.ParserError:
            self.returns_check['is_csv'] = False
        
        if 'data' not in locals():
            # O arquivo não pôde ser lido como CSV, então retornamos
            return self.returns_check
        
        # Verifica se o arquivo possui a quantidade de colunas esperada
        if len(data.columns) == SHAPE_DEFAULT[1]:
            self.returns_check['length'] = True
        else:
            self.returns_check['length'] = False

        # Verifica se possui linhas o suficiente para a classificação e se possui a primeira linha como cabeçalho, se tiver remove.
        if data.shape[0] >= SHAPE_DEFAULT[0] and not pd.api.types.is_numeric_dtype(data.iloc[0, 0]):
            data = data.iloc[1:]

        # Verifica se todos os valores são numéricos
        if data.select_dtypes(include=[np.number]).shape == data.shape:
            self.returns_check['is_numeric'] = True
        else:
            self.returns_check['is_numeric'] = False
        
        return self.returns_check
