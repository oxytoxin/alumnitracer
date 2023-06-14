const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: 'class',
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php', "./vendor/awcodes/filament-table-repeater/resources/views/**/*.blade.php",],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
                primary: {
                    DEFAULT: '#F56F1C', 50: '#FDDFCC', 100: '#FCD2B8', 200: '#FAB991', 300: '#F8A16A', 400: '#F78843', 500: '#F56F1C', 600: '#D05509', 700: '#9A3F07', 800: '#642904', 900: '#2F1302', 950: '#140801'
                },
            },
            fontFamily: {
                poppins: 'Poppins, sans-serif',
            },
            gridTemplateColumns: {
                // Simple 16 column grid
                'ram': 'repeat(auto-fill, minmax(190px, 1fr))',
              }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
