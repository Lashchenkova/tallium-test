import {Server} from 'http'
import socketio from 'socket.io'
import express from 'express'
import bodyParser from 'body-parser'

const app = express()
const server = Server(app)
const io = socketio(server)

io.set('origins', '*:*')

app.use(bodyParser.json())

app.post('/runtime', ({body}, res) => {
        io.sockets.to('runtime').emit('uuu', body)
        res.send('ok')
})

server.listen(3000, ()=> {
    console.log('Socket server is listening on port 3000!')
})
