import cv2
import numpy as np
import pandas as pd
import dlib
from tkinter import *
import tkinter
from Kmeans import kmeans

class Video:

    def analize(self,ruta,root, filename): 
        arreglo = ruta.split('.')
        pos1 = arreglo[1]
        arreglo2 = arreglo[0].split('/')
        longitud = len(arreglo2)
        pos2 =  arreglo2[longitud-1]
        detector = dlib.get_frontal_face_detector()

        predictor=dlib.shape_predictor("shape_predictor_68_face_landmarks.dat")

        cap = cv2.VideoCapture(ruta)

        data = pd.DataFrame(np.asarray([[0] for i in range(134)]).T)

        _, frame = cap.read()

        while frame is not None:
            
            gray = cv2.cvtColor(src=frame, code=cv2.COLOR_BGR2GRAY)

            faces=detector(gray)

            for face in faces:
                x1 = face.left()
                y1 = face.top()
                x2 = face.right()
                y2 = face.bottom()

                landmarks = predictor(image=gray, box=face)
                arreglo = {}
                
                i = 0
                for n in range(1,68):
                    x = landmarks.part(n).x
                    y = landmarks.part(n).y
                    arreglo[i] = x
                    i = i + 1
                    arreglo[i] = y
                    i = i + 1
                    cv2.circle(img=frame, center=(x,y), radius = 1, color=(0,0,0), thickness=-1)
                data.loc[len(data.index)] = arreglo
                

            cv2.imshow(winname="Face", mat=frame)
            _, frame = cap.read()
            if cv2.waitKey(delay=1)==27:
                cap.release()
                # df=data
                # df.head()
                data.drop(0,inplace=True)
                data.index.name="frame"
                new_cols = ['m1x','m1y','m2x','m2y','m3x','m3y','m4x','m4y','m5x','m5y','m6x','m6y','m7x','m7y','m8x','m8y','m9x','m9y','m10x','m10y','m11x','m11y','m12x','m12y','m13x','m13y','m14x','m14y','m15x','m15y','m16x','m16y','m17x','m17y','ci1x','ci1y','ci2x','ci2y','ci3x','ci3y','ci4x','ci4y','ci5x','ci5y','cd1x','cd1y','cd2x','cd2y','cd3x','cd3y','cd4x','cd4y','cd5x','cd5y','n1x','n1y','n2x','n2y','n3x','n3y','n4x','n4y','n5x','n5y','n6x','n6y','n7x','n7y','n8x','n8y','n9x','n9y','oi1x','oi1y','oi2x','oi2y','oi3x','oi3y','oi4x','oi4y','oi5x','oi5y','oi6x','oi6y','od1x','od1y','od2x','od2y','od3x','od3y','od4x','od4y','od5x','od5y','od6x','od6y','b1x', 'b1y', 'b2x','b2y','b3x','b3y','b4x', 'b4y','b5x', 'b5y', 'b6x', 'b6y', 'b7x', 'b7y','b8x', 'b8y','b9x', 'b9y','b10x', 'b10y','b11x', 'b11y','b12x', 'b12y','b13x', 'b13y','b14x', 'b14y','b15x', 'b15y','b16x', 'b16y','b17x', 'b17y','b18x', 'b18y','b19x', 'b19y']
                data.columns = new_cols
                data.to_csv(pos2+".csv")
                break

        cap.release()
        # df=data
        # df.head()
        # print(data.columns)
        data.drop(0,inplace=True)
        data.index.name="frame"
        new_cols = ['m1x','m1y','m2x','m2y','m3x','m3y','m4x','m4y','m5x','m5y','m6x','m6y','m7x','m7y','m8x','m8y','m9x','m9y','m10x','m10y','m11x','m11y','m12x','m12y','m13x','m13y','m14x','m14y','m15x','m15y','m16x','m16y','m17x','m17y','ci1x','ci1y','ci2x','ci2y','ci3x','ci3y','ci4x','ci4y','ci5x','ci5y','cd1x','cd1y','cd2x','cd2y','cd3x','cd3y','cd4x','cd4y','cd5x','cd5y','n1x','n1y','n2x','n2y','n3x','n3y','n4x','n4y','n5x','n5y','n6x','n6y','n7x','n7y','n8x','n8y','n9x','n9y','oi1x','oi1y','oi2x','oi2y','oi3x','oi3y','oi4x','oi4y','oi5x','oi5y','oi6x','oi6y','od1x','od1y','od2x','od2y','od3x','od3y','od4x','od4y','od5x','od5y','od6x','od6y','b1x', 'b1y', 'b2x','b2y','b3x','b3y','b4x', 'b4y','b5x', 'b5y', 'b6x', 'b6y', 'b7x', 'b7y','b8x', 'b8y','b9x', 'b9y','b10x', 'b10y','b11x', 'b11y','b12x', 'b12y','b13x', 'b13y','b14x', 'b14y','b15x', 'b15y','b16x', 'b16y','b17x', 'b17y','b18x', 'b18y','b19x', 'b19y']
        # print(len(new_cols))
        data.columns = new_cols
        data.to_csv(pos2+".csv")
        # arreglo3 = pos2.split(" ")
        # id = arreglo3[1]
        # print("prueba: ",pos1," Id de sujeto: ",id)
        id=12
        pos=""
        kmedia = kmeans(id, pos)
        btn2 = tkinter.Button (root, text = "Analizar", padx=157, pady=12, background="green", foreground="white", command=kmedia.Analizar(pos2, filename))
        btn2.grid(row=5, column=0) 
        cv2.destroyAllWindows()