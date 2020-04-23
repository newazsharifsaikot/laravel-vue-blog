    window.Vue = require('vue')
    var moment = require('moment')

    Vue.filter('dateFormater', function (value) {
    return moment(value).format("MMM Do YYYY");
})

    Vue.filter('truncate', function (value, limit) {
        if (value.length > limit) {
            value = value.substring(0, limit) + '...';
        }

        return value
    })