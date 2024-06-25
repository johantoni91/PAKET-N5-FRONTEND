const { Server } = require("socket.io");

const io = new Server(3000, {
    cors: {
        origin: "*", // Adjust the CORS policy as needed
    },
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
