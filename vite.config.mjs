import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { nodePolyfills } from "vite-plugin-node-polyfills";
import vitePluginSocketIO from "vite-plugin-socket-io";

const socketEvents = (io, socket) => {
    console.log('socket.io - connection');
    socket.on('disconnect', () => {
        console.log(`socket.io - socket.id \`${socket.id}\` disconnected`)
    })
    socket.on('signin', () => {
        console.log('socket.io - signin')
    })
}

export default defineConfig({
    plugins: [
        vitePluginSocketIO({ socketEvents }),
        nodePolyfills({
            globals: {
                Buffer: true, // can also be 'build', 'dev', or false
                global: true,
                process: true,
            },
            overrides: {
                fs: "memfs", // Since `fs` is not supported in browsers, we can use the `memfs` package to polyfill it.
            },
            protocolImports: true,
        }),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/listenerEvent.js",
                "resources/js/serverEvent.js",
                "resources/js/socketEvent.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                format: "es",
            },
        },
    },
    resolve: {
        alias: {
            "@": "/resources/js",
        },
    },
});
