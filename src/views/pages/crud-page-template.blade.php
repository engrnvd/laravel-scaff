<div id="crud-page" class="page">
    <h2 class="text-center">Generate CRUD</h2>
    <v-alert type="success" v-if="response">@{{ response }}</v-alert>
    <apm-form action="/naveed/scaff/gen-crud" v-model="form" @on-success="onSuccess" :before-send="beforeSend">
        <table class="table text-center">
            <tbody>
            <tr>
                <td>
                    <div class="d-flex justify-center align-center table-name-container">
                        <apm-form-element field="tableName" :model="form" class="flex-grow-1">
                            <v-text-field v-model="form.tableName" label="Table / Collection Name" autofocus/>
                        </apm-form-element>
                        <div class="mx-4">
                            <a href @click.prevent="loadTableDefinition()" title="Load fields from existing file">
                                <i class="mdi mdi-refresh"></i>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <apm-form-element field="idField" :model="form">
                        <v-text-field label="ID Field" v-model="form.idField" placeholder="e.g. id"/>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element field="timestamps" :model="form">
                        <v-switch label="Timestamps" v-model="form.timestamps"/>
                    </apm-form-element>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="table text-center centered">
            <thead>
            <tr>
                <th>Field Name</th>
                <th>Type</th>
                <th>Length / Values</th>
                <th>Default</th>
                <th>Required</th>
                <th>Index</th>
                <th>Unique</th>
                <th style="min-width: 110px">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(field, index) in form.fields">
                <td>
                    <apm-form-element :field="'fields.'+index+'.name'" :model="form">
                        <v-text-field v-model="field.name" :autofocus="!!form.tableName.length"/>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element :field="'fields.'+index+'.type'" :model="form">
                        <v-autocomplete
                            :items="fieldTypes"
                            v-model="field.type"
                        ></v-autocomplete>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element field="length" :model="form" v-if="field.type != 'enum'">
                        <v-text-field v-model="field.length"/>
                    </apm-form-element>
                    <apm-form-element :field="'fields.'+index+'.enumValues'" :model="form" v-if="field.type == 'enum'">
                        <v-combobox v-model="field.enumValues"
                            :items="[]"
                            multiple
                            placeholder="Press enter to add a new value"
                            chips
                        ></v-combobox>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element field="default" :model="form">
                        <v-text-field v-model="field.default"/>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element :field="'fields.'+index+'.required'" :model="form">
                        <v-switch v-model="field.required"/>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element field="index" :model="form">
                        <v-switch v-model="field.index"/>
                    </apm-form-element>
                </td>
                <td>
                    <apm-form-element field="unique" :model="form">
                        <v-switch v-model="field.unique"/>
                    </apm-form-element>
                </td>
                <td>
                    <v-btn class="mx-2" fab dark small color="success"
                           @click="form.fields.push(fieldTemplate())">
                        <v-icon dark>mdi-plus</v-icon>
                    </v-btn>
                    <v-btn class="mx-2" fab dark small color="red"
                           v-if="form.fields.length > 1"
                           @click="form.fields.splice(index, 1)">
                        <v-icon dark>mdi-minus</v-icon>
                    </v-btn>
                </td>
            </tr>
            <tr>
                <td>
                    <v-btn type="submit" color="primary">Generate</v-btn>
                </td>
            </tr>
            </tbody>
        </table>
    </apm-form>
</div>
