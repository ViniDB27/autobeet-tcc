from flask import Flask
from flask_restful import Resource, Api, reqparse
from ia import Ia

app = Flask(__name__)
api = Api(app)


class IaController(Resource):
    def post(self):
        request = reqparse.RequestParser
        request.add_argument('file')
        body = request.parse_args()
        ia = Ia.Ia()
        return ia.run(body['file'])


api.add_resource(IaController, '/')

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=8082)
