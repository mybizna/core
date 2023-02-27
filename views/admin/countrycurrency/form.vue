<template>
    <edit-render :path_param="['core', 'countrycurrency']" :model="model">
        <div class="row">
            <div class="col-md-6">

                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.currency_code" label="Currency Code" id="currency_code" type="text" validation="required" />
                <FormKit v-model="model.country_code" label="Country Code" id="country_code" type="text" validation="required" />
                <FormKit v-model="model.country_code3" label="Country Code3" id="country_code3" type="text" validation="required" />

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </edit-render>
</template>

<script>
export default {
    data () {
        return {
            id: null,
            model: {
                id: "",
                currency_code: "",
                country_code: "",
                country_code3: "",
            },

        };
    }
};
</script>
