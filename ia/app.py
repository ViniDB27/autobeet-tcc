from flask import Flask
from flask_restful import Resource, Api, reqparse
from ia import Ia

app = Flask(__name__)
api = Api(app)


class IaController(Resource):
    def post(self):
        #request = reqparse.RequestParser
        #print(request)
        #request.add_argument('file')
        #print(request.parse_args())

        ia = Ia.Ia()
        return ia.run('./storage/app/diagnostics/df1fd22e-fb98-45d0-8bcc-f8a994faea1a.csv')


api.add_resource(IaController, '/')

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=8082, debug=True)
