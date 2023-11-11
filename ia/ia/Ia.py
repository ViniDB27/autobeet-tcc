from flask import jsonify
from ia.check_data import Check
from ia.transform_data import TransformData
from ia.load_model import LoadModel
from ia.evaluate_model import EvaluateModel


class Ia:
    def run(self, data):
        try:
            check = Check()
            check_results = check.check_file(data)
            if all(value for value in check_results.values()):
                transformData = TransformData()
                processed_data = transformData.transformation_and_tensor(data)
                model_cnn = LoadModel()
                classification = EvaluateModel(model_cnn, processed_data).evaluate()
                
            else:
                return jsonify({'error': 'O arquivo não passou nas verificações'})

            return jsonify({'success': 'Classificação realizada com sucesso', 'result':classification})
        
        except Exception as e:
            # Lidando com exceções não tratadas, como problemas de leitura de arquivo, erros de transformação, etc.
            return jsonify({'error': f'Ocorreu um erro durante o processamento: {str(e)}'})
