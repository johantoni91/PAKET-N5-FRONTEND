const express = require("express");
const app = express();
const http = require("http");
const server = http.createServer(app);

const io = require("socket.io")(server, {
    cors: { origin: "*" },
});

io.on("connection", (socket) => {
    console.log("connection");

    socket.on("notification", (message) => {
        console.log(message);

        io.emit("sendNotification", message);
    });
    socket.on("disconnect", (socket) => {
        console.log("disconnect");
    });
});

server.listen(3000, () => {
    console.log("Server is running");
});
