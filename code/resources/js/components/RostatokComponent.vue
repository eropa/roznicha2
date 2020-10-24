<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Склад</label>
                        <select class="form-control" id="exampleFormControlSelect1" v-model="sklad_id">
                            <option value="0">Выберите склад</option>
                            <option v-for="sk in sklad" v-bind:value="sk.id">{{sk.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <button
                           v-if="show_spiner==0"
                           v-on:click="runostatok()"
                           class="btn btn-success">Сформировать остаток</button>
                    </div>
                    <div class="spinner-border text-primary"
                         v-if="show_spiner"
                         role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
            </div>
            <div class="row">

                <table class="table table-hover" v-if="show_ostatok">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Гр.товара</th>
                        <th scope="col">Название</th>
                        <th scope="col">Приxод</th>
                        <th scope="col">Расxод</th>
                        <th scope="col">Остаток</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="print in ostatok">
                        <th scope="row">{{print.ass_id}}</th>
                        <td>{{print.ass_group}}</td>
                        <td>{{print.ass_name}}</td>
                        <td>{{print.prixod}}</td>
                        <td>{{print.rasxod}}</td>
                        <td>{{print.ostatok}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RostatokComponent",
        data() {
            return {
                sklad_id:0,
                show_spiner:0,
                show_sklad:0,
                sklad:[],
                ostatok:[],
                show_ostatok:0,
            }
        },
        methods: {
            // поиск расходов
            runostatok:function () {
                this.show_spiner=1;
                axios.post('/upanel/report/ostatok').then((response) => {
                    console.log(response.data);
                    this.show_ostatok=1;
                    this.show_spiner=0;
                    this.ostatok = response.data;
                });


            }
        },
        created: function () {
            // `this` указывает на экземпляр vm
            axios.post('/get/skladlist').then((response) => {
                console.log(response.data);
                this.sklad = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
