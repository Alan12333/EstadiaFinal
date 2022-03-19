import requests 

class Conexion:
    def __init__(self,id):
        self.id = id
    
    def POSTDATA(self,amargo,neutral,feliz):
        files = {
            'sensation':(None,''),
            'id': (None, self.id),
            'amargo': (None, amargo),
            'neutral':(None,neutral),
            "feliz":(None,feliz)
        }
        response = requests.post('http://localhost/Estancia_Api/Api/', files=files)
        return response
    
    def GETDATA():
        print("espere..")
        URL = "http://localhost/apis/?sold=0303&clave=0204";

        data = requests.get(URL)
        data = data.json()
        for element in data:
            print(element['Aviso'])