from flask import Flask, request, abort

from linebot import (
    LineBotApi, WebhookHandler
)
from linebot.exceptions import (
    InvalidSignatureError
)
from linebot.models import (
    MessageEvent, TextMessage, TextSendMessage,FollowEvent
)

app = Flask(__name__)

line_bot_api = LineBotApi('pyx6gAC/8vlk5+rq6PzQky6/I/qUClh6kPOzfCCrsGzT1OAQq/dwXGLzpQ075cIPVeRNetZCHbXXActGf0qB+yt2EayldK1FJPsYnO0g53S4HfF5CJO1CEmaWtwDaC0muXWoV1cEQigMA6opJK3LeAdB04t89/1O/w1cDnyilFU=')
handler = WebhookHandler('cf13baeb7e1a004b6b8309a02f977896')


@app.route("/callback", methods=['POST'])
def callback():
    # get X-Line-Signature header value
    signature = request.headers['X-Line-Signature']

    # get request body as text
    body = request.get_data(as_text=True)
    app.logger.info("Request body: " + body)

    # handle webhook body
    try:
        handler.handle(body, signature)
    except InvalidSignatureError:
        print("Invalid signature. Please check your channel access token/channel secret.")
        abort(400)

    return 'OK'


@handler.add(MessageEvent, message=TextMessage)
def handle_message(event):
    # line_bot_api.reply_message(
    #     event.reply_token,
    #     TextSendMessage(text=event.message.text))
    line_bot_api.reply_message(
        event.reply_token,
        TextSendMessage(text="https://liff.line.me/1656172230-rXaDQezw"))

@handler.add(FollowEvent)
def handle_follow(event):
    app.logger.info("Got Follow event:" + event.source.user_id)
    line_bot_api.reply_message(
        event.reply_token, TextSendMessage(text='https://liff.line.me/1656172230-rXaDQezw'))
    
if __name__ == "__main__":
    app.run(host="localhost",port=800)
