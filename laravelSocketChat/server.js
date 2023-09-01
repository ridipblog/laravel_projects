const express = require("express");
const app = express();
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
    cors: {
        origin: "*",
    },
});
io.on("connection", (socket) => {
    console.log("Connection ");
    socket.on("sendChatToServer", (message) => {
        console.log(message);
        // io.sockets.emit("sendChatToServer", message);

        // display only show reciver
        socket.broadcast.emit("sendChatToServer", message);
    });
    socket.on("disconnect", (socket) => {
        console.log("Disconnected");
    });
});

server.listen(3000, () => {
    console.log("Server Running");
});
