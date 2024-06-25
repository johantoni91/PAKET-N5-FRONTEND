import { createServer } from "http";
import { Server } from "socket.io";

const httpServer = createServer();
const io = new Server(httpServer, {
    // options
});

io.on("connection", (socket) => {
    console.log("a user connected");

    socket.on("disconnect", () => {
        console.log("user disconnected");
    });

    socket.on("message", (msg) => {
        console.log("message: " + msg);
        io.emit("message", msg);
    });
});

httpServer.listen(3000);
