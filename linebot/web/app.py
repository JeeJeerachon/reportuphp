from flask import Flask,render_template,request

app = Flask(__name__)

import pymysql.cursors

connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             database='sqltest1',
                             charset='utf8mb4',
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

        check = select_data(username)
        if check == None:
            insert_data(username,token) 
        else:    
            update_data(username,token)      
        
    return render_template("end.html")


def select_data(username):
    with connection.cursor() as cursor:
        cursor.execute("SELECT token from line where Username = '"+(username)+"'")
        result = cursor.fetchone()
    return result


def insert_data(username,token):
    with connection.cursor() as cursor:
        sql = "INSERT INTO `line` (`Username`, `token`) VALUES (%s, %s)"
        cursor.execute(sql,(username,token))
    connection.commit()



def update_data(username,token):
    with connection.cursor() as cursor:  
        sql = "UPDATE line SET token = (%s) where Username = (%s)"
        cursor.execute(sql, (token,username))
    connection.commit()

if __name__=="__main__":
    app.run()

