<template>
    <div>
        <h1>List Saved Urls</h1>
        <div v-if="loading">connecting to API Server...</div>
        <div v-else>
            <ul id="url-list">
                <li v-for="item in items">
                    {{ baseUrl + "/" + item.id }} => {{ item.url }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    created(){
        this.loading = true;

        const request = axios.get("/api/urls").
        then(response => {
            this.items = response.data;
            this.loading = false;
        });
    },
    data() {
        return {
            items : null,
            loading: false,
            baseUrl: this.baseURL(),
        }
    },
    methods:{
        baseURL(){
            return window.location.origin;
        }
    },
    props: {},
    mounted(){},
}
</script>
