const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    baseUrl: 'https://mvc-bienes-raices.test',
    setupNodeEvents(on, config) {
    },
  },
});
