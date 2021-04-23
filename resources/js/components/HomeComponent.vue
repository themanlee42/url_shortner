<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Enter URL</h5>
                <p class="card-text">Enter Url to be shortened</p>
                <div class="url-row row">
                    <div class="form-group col-md-6">
                        <label for="url">Enter a valid URL</label>
                        <input
                            type="text"
                            name="url"
                            class="form-control form-control-sm mb-2"
                            placeholder="https://google.com"
                            v-model="url"
                            @keyup.enter="submit"
                            :class="[{'is-invalid': this.errorFor('url')}]"
                        />
                        <div
                            class="invalid-feedback"
                            v-for="(errors, index) in this.errorFor('url')"
                            :key="'to' + index">
                            {{ errors }}
                        </div>
                        <button class="btn btn-secondary" @click="submit" :disabled="loading">Submit</button>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="s-url">Shortened URL</label>
                        <input
                            type="text"
                            name="s-url"
                            class="form-control form-control-sm mb-2"
                            v-model="s_url"
                            value=""
                            :disabled=disableSurl
                        />
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    props: {},
    created(){},
    mounted() {
    },
    data() {
        return {
            url : null,
            s_url: null,
            loading: false,
            errors: null,
            status: null
        };
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null;
        },
        hasAvailability() {
            return this.status === 200 || this.status === 201;
        },
        noAvailability() {
            return 404 === this.status;
        },
        disableSurl() {
            return !this.hasAvailability;
        }
    },
    methods: {
        submit() {
            this.loading = true;
            this.errors = null;

            axios.post('/api/urls/check',{
                url: this.url,
            })
            .then(response => {
                this.status = response.status;
                this.s_url = this.baseURL() + '/' + response.data.id;
            })
            .catch(error => {
                this.errors = error.response.data.errors;
                this.status = error.response.status;

                if (this.status == 404) {
                    this.submitURL();
                }
            })
            .then(() => this.loading = false);
        },
        submitURL() {
            axios.post('/api/urls',{
                url: this.url,
            })
                .then(response => {
                    this.status = response.status;
                    this.s_url = this.baseURL() + '/' + response.data.id;
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.status = error.response.status;
                });
        },
        baseURL(){
            return window.location.origin;
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    }
}
</script>

<style scoped>
label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: green;
    font-weight: bolder;
}
</style>
