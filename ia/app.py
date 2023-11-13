from flask import Flask
from flask_restful import Resource, Api, reqparse
from ia import Ia

app = Flask(__name__)
api = Api(app)


class IaController(Resource):
    def post(self):
        parser = reqparse.RequestParser()
        parser.add_argument('file', type=str)
        args = parser.parse_args()
        file = str(args['file'])

        ia = Ia.Ia()
        return ia.run(f'./storage/app/{file}')


api.add_resource(IaController, '/')

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=8082, debug=True)
