module.exports = {
  content: [
    './components/**/*.{php,js,css}',
    './templates/**/*.php',
    './lib/**/*.php',
    './resources/**/*.{js,css}',
    './search.php',
    './index.php',
    './base.php',
    './404.php',
    /*
     * Include files that have css classes that need to be rendered
     * Files and folders that don't exist should not be included
     * Below you will see some examples of files/paths that are not included and why and when to include them
     */
    // './page.php', // Include this line if you end up adding markup with classes to file
    // './single.php', // Include this line if you end up adding markup with classes to the file
    // './woocommerce/**/*.php', // Include this line if you end up adding woocommerce file overrides
    // './functions.php', // This file is not neccessary to include since it only holds references to all the other functions
    // './*.php', DO NOT INCLUDE THIS LINE
  ],
  safelist: [
    {
      pattern: /object-.+/
    },
    {
      pattern: /(my|mb|mt|mx|py|pb|pt|px)-.+/,
      variants: ['sm', 'md', 'lg', 'xl'],
    },
    {
      pattern: /w-\d{1,2}\/\d{1,2}/,
      variants: ['sm', 'md', 'lg', 'xl'],
    },
    {
      pattern: /grid-cols-/,
      variants: ['sm', 'md', 'lg', 'xl'],
    },
    {
      pattern: /w-.+/,
    },
    {
      pattern: /h-.+/,
    },
    /* To safelist more classes such as text color or background color use something like below, if not using bg-brand or text-brand and opting for text- or bg- keep in mind this whitelists classes such as bg-opacity, text-xl etc. */
    {
      pattern: /bg-brand-.+/
    }
  ],
  theme: {
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      black: '#000',
      white: '#fff',
      brand: {
        'deep-green': '#004833',
        'deep-green-tint': '#80A399',
        'deep-green-tint-2': '#266352',
        'light-green': '#77AB42',
        'light-green-2': '#8BB85E',
        'light-green-3': '#BBD5A0',
        'light-green-4': '#DDEAD0',
        'orange': '#F68C41',
        'error': '#E95050',
        'off-black': '#363B40',
        'gray': '#5F5F5F',

        'highlight': '#DDDDD',
        'primary': '#5FB0C8',
        'light-gray': '#BEBEBE',
        'dark-gray': '#443E51',
        'scrim': 'rgba(0,0,0,0.8)',
        'green-overlay': 'rgba(119, 171, 66, 0.8)',
      },
      form: {
        'placeholder': '#777777',
        'description': '#9C9C9C',
        'error': '#FF5454',
        'focus': '#5A56F9',
        'radio-button-unchecked': '#80A399',
        'radio-button-checked': '#80A399',
        'toggle-unchecked': '#80A399',
        'toggle-checked': '#80A399',
      },
      button: {
        DEFAULT: '#4B4DED',
        'hover': '#0500D7',
      }
    },
    fontFamily: {
      sans: [
        '"DM Sans 9pt"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
      poppins: [
        'Poppins',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ]
    },
    fontSize: {
      xs: 12 / 16 + 'rem',
      sm: 14 / 16 + 'rem',
      base: 16 / 16 + 'rem',
      lg: 18 / 16 + 'rem',
      xl: 20 / 16 + 'rem',
      '2xl': 24 / 16 + 'rem',
      '3xl': 28 / 16 + 'rem',
      '4xl': 32 / 16 + 'rem',
      '5xl': 40 / 16 + 'rem',
      '6xl': 48 / 16 + 'rem',
      '7xl': 56 / 16 + 'rem',
      '8xl': 64 / 16 + 'rem',
      '9xl': 96 / 16 + 'rem',
    },
    lineHeight: {
      none: '1',
      tight: '1.25',
      snug: '1.33',
      normal: '1.45',
      relaxed: '1.625',
      loose: '2',
    },
    letterSpacing: {
      tighter: '-0.05em',
      tight: '-0.01em',
      normal: '0',
      wide: '0.025em',
      wider: '0.05em',
      widest: '0.1em',
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1270px',
    },
    container: {
      center: true,
      padding: {
        DEFAULT: 'calc( var(--gutter) * 2 )',
        lg: '3.125rem', // 50px
      }
    },
    extend: {
      spacing: {
        gutter: 'var(--gutter, 1rem )', // 16px
        'gutter-full': 'calc( var(--gutter) * 2 )', //32px
        '7': '1.75rem', // 28px
        '18': '4.5rem', // 72px
        '25': '6.25rem', //100px
        '30': '7.5rem', // 120px
      },
      // this section allows you to add more style class options without overwriting all the options for a single style option (for example the z-index and adding -1). You can reference tailwindcss version 3.1.7 docs to see how to extend specific config options not included below
      zIndex: {
        '-1': '-1'
      },
      backgroundImage: {
        // 'gradient-fade-tr': 'linear-gradient(71.24deg, #000000 20.76%, rgba(0, 0, 0, 0) 100%)', // custom gradient example. Usuage would be bg-gradient-fade-tr
      },
      boxShadow: {
        'form-focus': '0px 0px 0px 4px rgba(0, 0, 0, 0.25)',
      }
    },
  },
}
