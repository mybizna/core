<template>
    <edit-render :path_param="['core', 'setting']" :model="model" passed_form_url="setting/savedata">

        <Vueform :model-value="mdata" :sync="true">

            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <template v-for="(setting, s_index) in model.settings" v-bind:key="s_index">
                        <button :class="s_index == current_tab ? 'nav-link active' : 'nav-link'"
                            :id="'v-pills-' + s_index + '-tab'" data-bs-toggle="tab"
                            :data-bs-target="'#v-pills-' + + s_index" type="button" role="tab" :aria-controls="s_index"
                            :aria-selected="!s_index ? 'true' : 'false'" @click="current_tab = s_index">
                            {{
                                setting.title
                            }}</button>
                    </template>
                </div>
                <div class="tab-content w-3/4" id="v-pills-tabContent">
                    <div v-for="(setting, s_index) in model.settings" v-bind:key="s_index"
                        :class="s_index == current_tab ? 'tab-pane fade show active' : 'tab-pane fade'" :id="s_index"
                        role="tabpanel" :aria-labelledby="s_index + '-tab'">
                        <div class="p-2">
                            <div v-for="(subsetting, ss_index) in setting.settings" v-bind:key="ss_index">
                                <h3 class="my-3 border-b-2 border-indigo-200 ">{{ subsetting.title }}</h3>
                                <template v-for="(field, ssl_index) in subsetting.list" v-bind:key="ssl_index">

                                    <TextareaElement v-if="field.params.type == 'textarea'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <EditorElement v-else-if="field.params.type == 'editor'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <CheckboxElement v-else-if="field.params.type == 'checkbox'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <CheckboxgroupElement v-else-if="field.params.type == 'checkboxgroup'"
                                        :name="field.name" :label="field.params.title" :id="field.name"
                                        :placeholder="field.params.title" :description="field.params.description"
                                        :info="field.params.info" />

                                    <RadioElement v-else-if="field.params.type == 'radio'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <RadiogroupElement v-else-if="field.params.type == 'radiogroup'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <ToggleElement v-else-if="field.params.type == 'toggle'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <ToggleElement v-else-if="field.params.type == 'switch'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <SelectElement v-else-if="field.params.type == 'select'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <MultiselectElement v-else-if="field.params.type == 'multiselect'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <TagsElement v-else-if="field.params.type == 'tags'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <DateElement v-else-if="field.params.type == 'date'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <DatesElement v-else-if="field.params.type == 'dates'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <SliderElement v-else-if="field.params.type == 'slider'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <FileElement v-else-if="field.params.type == 'file'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <MultifileElement v-else-if="field.params.type == 'multifile'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <LocationElement v-else-if="field.params.type == 'location'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <HiddenElement v-else-if="field.params.type == 'hidden'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <StaticElement v-else-if="field.params.type == 'static'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <RecordpickerElement v-else-if="field.params.type == 'recordpicker'" :name="field.name"
                                        :label="field.params.title" :id="field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :comp_url="field.params.comp_url" :setting="field.params.setting" />

                                    <TextElement v-else :name="field.name" :label="field.params.title" :id="field.name"
                                        :placeholder="field.params.title" :description="field.params.description"
                                        :info="field.params.info" />

                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </Vueform>
    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            current_tab: 'core',
            model: { settings: {} },
            mdata: { sales_default_ledger: 'sdsdfdsf' }
        }
    },
    created() {
        this.fetchData();
    },

    methods: {
        getNow: function () {

        },
        fetchData() {

            var t = this;
            var comp_url = 'fetch_settings/';

            const getdata = async (t) => {

                await window.axios.get(comp_url)
                    .then(
                        response => {
                            t.model.settings = response.data;

                            var arr_tabs = Object.keys(t.model.settings);

                            for (const skey in t.model.settings) {
                                if (t.model.settings.hasOwnProperty(skey)) {
                                    let sdata = t.model.settings[skey];
                                    for (const ckey in sdata.settings) {
                                        if (sdata.settings.hasOwnProperty(ckey)) {
                                            let list = sdata.settings[ckey].list;

                                            list.forEach(element => {
                                                t.mdata[element.name] = element.params.value;
                                            });

                                        }
                                    }
                                }
                            }



                            t.current_tab = arr_tabs[0];
                        });
            };

            getdata(this);
        },
    }
};
</script>