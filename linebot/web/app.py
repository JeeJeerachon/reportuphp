from flask import Flask,render_template,request
# from flask_mysqldb import MySQL, MySQLdb

app = Flask(__name__)

# app.config['MYSQL_USER']='root'
# app.config['MYSQL_PASSWORD']=''
# app.config['MYSQL_HOST']='localhost'
# app.config['MYSQL_DB']=''
# app.config['MYSQL_CURSORCLASS']='DictCursor'

# mysql = MySQL(app)

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
    print(password)
    print(token)

    return "ควย"

# cur = mysql.connection.cursor()
# cur.execute("INSERT INTO member (name,username,password) VALUES (%s,%s,%s)",(name,username,password)) 
# mysql.connection.commit() 


if __name__=="__main__":
    app.run()