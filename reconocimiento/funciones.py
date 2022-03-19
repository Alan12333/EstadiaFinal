from tkinter import filedialog
from tkinter import *
import tkinter
import os
import collections

class Functions:
    root = Tk()
    def __init__(self,video, name):
        self.video = video
        self.name = name

    def Start(self):
        
        self.root.geometry("400x600+150+75")
        self.root.resizable(width=True, height=True)
        self.DefineButtons(self.root)
        self.root.title=("Reconocimiento de Emociones")
        self.root.mainloop()

    def openfn(self):
        filename = filedialog.askopenfilename(title='open')
        return filename

    def open_img(self):
        x = self.openfn()
        self.video.analize(x,self.root, self.name)

    def DefineButtons(self,root):
        label1 = tkinter.Label(self.root, text="Analizador de Videos", background="black", foreground="white", padx=150, pady=30)
        button1 = tkinter.Button (self.root, text = "Abrir Video", padx=150, pady=12, background="orange", foreground="white", command=self.open_img) 
        #button2 = tkinter.Button (root, text = "Grabar Video", padx=145, pady=12, background="blue", foreground="white", command=GrabarVideo) 
        label1.grid(row=0, column=0)
        button1.grid(row=2, column=0)
        # button2.grid (row=4, column=0)