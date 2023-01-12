module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        screens: {
            xs: '360px',
            sm: '640px',
            md: '992px',
            lg: '1024px',
            xl: '1200px',
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '1.25rem',
                lg: '0rem',
            }
        },
        extend: {
            colors: {
                secondary: {
                    light: '#d5ffdc',
                    DEFAULT: '#37B24D',
                    dark: '#1c6e2b',
                },
                primary: {
                    light: '#ffd3d3',
                    DEFAULT: '#ab1628',
                    dark: '#440109',
                },
                success: {
                    light: '#d5ffdc',
                    DEFAULT: '#37B24D',
                    dark: '#1c6e2b',
                },
                warning: {
                    light: '#FFEDC0',
                    DEFAULT: '#FFD43B',
                    dark: '#805D05',
                },
                danger: {
                    light: '#FDF1F2',
                    DEFAULT: '#DC3545',
                    dark: '#7e2934',
                },
            },
            fontFamily: {
                sans: ['verdana'],
            },
        },
    },
    important: true,
    plugins: [
        function ({ addComponents }) {
            addComponents({
                '.container': {
                    maxWidth: '100%',
                    '@screen lg': {
                        maxWidth: '960px',
                    },
                    '@screen xl': {
                        maxWidth: '1200px',
                    },
                }
            })
        }
    ],
};
