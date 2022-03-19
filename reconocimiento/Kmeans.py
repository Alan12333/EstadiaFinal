import pandas as pd
from matplotlib.pyplot import axis, grid, text
import matplotlib.pyplot as plt
import numpy as np
from PIL import ImageTk, Image
import seaborn as sb
from sklearn.cluster import KMeans
from sklearn.metrics import pairwise_distances_argmin_min
from sklearn.utils.extmath import row_norms
from data import Conexion
from Archivos import Archivo
import os

class kmeans:

    def __init__(self,id,prueba):
        self.prueba = prueba
        self.id=id

    def Analizar(self, ruta, name):
        
        from mpl_toolkits.mplot3d import Axes3D
        plt.rcParams['figure.figsize'] = (16, 9)
        plt.style.use('ggplot')
        
        dataframe = pd.read_csv(ruta+".csv")
        #print(dataframe.head()) #Muestra y pinta las etiquetas o cabeceras
        #clsprint(dataframe.describe()) #describe cada dato

        X = np.array(dataframe[['frame','m1x','m1y','m2x','m2y','m3x','m3y','m4x','m4y','m5x','m5y','m6x','m6y','m7x','m7y','m8x','m8y','m9x','m9y','m10x','m10y','m11x','m11y','m12x','m12y','m13x','m13y','m14x','m14y','m15x','m15y','m16x','m16y','m17x','m17y','ci1x','ci1y','ci2x','ci2y','ci3x','ci3y','ci4x','ci4y','ci5x','ci5y','cd1x','cd1y','cd2x','cd2y','cd3x','cd3y','cd4x','cd4y','cd5x','cd5y','n1x','n1y','n2x','n2y','n3x','n3y','n4x','n4y','n5x','n5y','n6x','n6y','n7x','n7y','n8x','n8y','n9x','n9y','oi1x','oi1y','oi2x','oi2y','oi3x','oi3y','oi4x','oi4y','oi5x','oi5y','oi6x','oi6y','od1x','od1y','od2x','od2y','od3x','od3y','od4x','od4y','od5x','od5y','od6x','od6y','b1x', 'b1y', 'b2x','b2y','b3x','b3y','b4x', 'b4y','b5x', 'b5y', 'b6x', 'b6y', 'b7x', 'b7y','b8x', 'b8y','b9x', 'b9y','b10x', 'b10y','b11x', 'b11y','b12x', 'b12y','b13x', 'b13y','b14x', 'b14y','b15x', 'b15y','b16x', 'b16y','b17x', 'b17y','b18x', 'b18y','b19x', 'b19y']])
        kmeans = KMeans(n_clusters=3, random_state=self.Myseed()).fit(X)

        labels = kmeans.predict(X)

        C = kmeans.cluster_centers_
        colores=['red','green', 'yellow']
        asignar=[]
        for row in labels:
            asignar.append(colores[row])
        
        fig = plt.figure()
        ax = Axes3D(fig)
        fig.add_axes(ax)
        ax.scatter(X[:, 0], X[:, 1], X[:, 2], c=asignar,s=60)
        ax.scatter(C[:, 0], C[:, 1], C[:, 2], marker='*', c=colores, s=1000)
        copy =  pd.DataFrame()
        copy['label'] = labels;
        cantidadGrupo =  pd.DataFrame()
        cantidadGrupo['color']=colores
        cantidadGrupo['cantidad']=copy.groupby('label').size()
        X_new = np.array(pd.read_csv(r"datos.csv")) 
        arreglos2 =kmeans.predict(X_new)

        cont = np.count_nonzero(arreglos2 == 0)
        cont2 = np.count_nonzero(arreglos2==1)
        cont3 = np.count_nonzero(arreglos2==2)
        
        resultado1 = (cont * 100) / len(X_new)
        resultado2 = (cont2 * 100) / len(X_new)
        resultado3 = (cont3 * 100) / len(X_new)
        
        archivo = Archivo()
        if os.path.exists(name+".csv"):
            print("entra")
            archivo.Reingresar(name, ruta+".mp4", resultado1, resultado2, resultado3)
        else:
            archivo.Crear(name)
            archivo.Reingresar(name, ruta+".mp4", resultado1, resultado2, resultado3)
        # json = Conexion(self.id)
        
        # json.POSTDATA(cont2, cont3, cont)

    def Myseed(self):
        myseed = 0
        return myseed

