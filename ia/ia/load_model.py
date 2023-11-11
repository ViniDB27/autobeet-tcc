import pickle

def LoadModel():
    with open('ia/trained_model/model_a/model_09_03_01_idx06_2023_08_13 23_50_08.h5','rb') as model_trained:
        model_loaded = pickle.load(model_trained)
        return model_loaded