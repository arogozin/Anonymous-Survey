Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
    el: '#app',
    data: {
        question: null,

        survey: {
            title: null,
            class: null,
            semester: null,
            questions: [],
        }
    },
    
    methods: {
        addQuestion: function() {
            if (this.question != '' && this.question != null) {
                this.survey['questions'].push(this.question);
                this.question = null;
            }
        },
        removeQuestion: function(question) {
            this.survey['questions'].$remove(question);
        },
        submitSurvey: function() {
            var apiCall = this.$http.post('/api/survey/store', this.survey);
            
            apiCall.success(function(response) {
                console.log(response);
                window.location.replace("/admin/survey");
            });
            
            apiCall.error(function(response) {
                console.log(response);
            });
        },
    }
})