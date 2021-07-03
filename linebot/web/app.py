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

    with connection:
        with connection.cursor() as cursor:
            
            sql1 = "SELECT token from line where Username = (%s)"
            result = cursor.execute(sql1, (username))
            connection.commit()
            print (result)
            
        if result :
            update_data(username,token)
        else:
            insert_data(username,token)
            
        return render_template("end.html")


def insert_data(username,token):
    with connection:
        with connection.cursor() as cursor:
            
            sql = "INSERT INTO line (Username, token) VALUES (%s, %s)"
            cursor.execute(sql, (username,token))
        connection.commit()
def update_data(username,token):
    with connection:
        with connection.cursor() as cursor:
            
            sql = "update line set (token = (%s)) where username = (%s)"
            cursor.execute(sql, (token,username))
        connection.commit()

if __name__=="__main__":
    app.run()

