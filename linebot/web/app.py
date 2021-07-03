from flask import Flask,render_template,request

app = Flask(__name__)

import pymysql.cursors

connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             database='sqltest1',
                             cursorclass=pymysql.cursors.DictCursor)


@app.route('/',methods=['GET', 'POST'])
def index():
    return render_template('index.html')

@app.route('/addToken',methods=['GET', 'POST'])
def addToken():
    if request.method == "POST":
        username =request.form['user']
        password =request.form['pass']
        token = request.form['token_line']
    print(username)
    print(token)
    insert_data(username,token)
    return render_template("end.html")

def insert_data(username,token):
    with connection:
        with connection.cursor() as cursor:
            sql = "INSERT INTO line (Username, token) VALUES (%s, %s)"
            result = cursor.execute(sql, (username,token))
            connection.commit()
            if result == False :
                sql = "UPDATE line (token) where (%s) values(%s)"
                result = cursor.execute(sql, (username,token))
                connection.commit()
        


if __name__=="__main__":
    app.run()

