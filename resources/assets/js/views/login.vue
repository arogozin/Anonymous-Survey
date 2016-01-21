<template>
    <h1>hello {{ title }}</h1>
    <pre>{{ $data | json }}</pre>
</template>

<script>
    export default {
        data() {
            return {
                title: 'oh ok',
            }
        },
    }
</script>
