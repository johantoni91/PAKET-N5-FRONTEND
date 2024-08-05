import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { nodePolyfills } from "vite-plugin-node-polyfills";

export default defineConfig({
    plugins: [
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
    ]
});
