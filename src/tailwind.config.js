module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                primary: "#0d98b5",
                secondary: "#aed5e4",
                info: "#56acaf",
                primedark: "#026c82"
            },
            zIndex: {
                "-1": "-1"
            },
            height: {
                "44r": "44rem",
                "35r": "35rem"
            }
        }
    },
    variants: {
        extend: {}
    },
    plugins: [],
    purge: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ]
};
