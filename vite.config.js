import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { nodePolyfills } from "vite-plugin-node-polyfills";

export default defineConfig({
    plugins: [
        nodePolyfills({
            // To exclude specific polyfills, add them to this list. Note: if include is provided, this has no effect
            exclude: [
                "http", // Excludes the polyfill for `http` and `node:http`.
            ],
            // Whether to polyfill specific globals.
            globals: {
                Buffer: true, // can also be 'build', 'dev', or false
                global: true,
                process: true,
            },
            // Override the default polyfills for specific modules.
            overrides: {
                // Since `fs` is not supported in browsers, we can use the `memfs` package to polyfill it.
                fs: "memfs",
            },
            // Whether to polyfill `node:` protocol imports.
            protocolImports: true,
        }),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
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
