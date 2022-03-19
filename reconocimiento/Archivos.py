import pandas as pd
import numpy as np

class Archivo():

    def Crear(self,name):
        data = pd.DataFrame(np.asarray([[0] for i in range(3)]).T)
        data.drop(0,inplace=True)
        new_cols = ['Amargo', 'Neutral', 'Agrado']
        data.index.name="Video"
        data.columns = new_cols
        data.to_csv(name+".csv")


    def Reingresar(self,name, video, valor1, valor2, valor3):
        with open(name+".csv", 'a') as resultado:
            resultado.write((video) + ",")
            resultado.write((str(valor1)) +",")
            resultado.write((str(valor2)) +",")  
            resultado.write((str(valor3)) +"\n")


    

