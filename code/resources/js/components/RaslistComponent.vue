<template>
    <div>
        <div class="row">
            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="datas">Дата С</label>
                        <input type="date" class="form-control" id="datas" v-model="data1" >
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="datapo">Дата ПО</label>
                        <input type="date" class="form-control"  v-model="data2" id="datapo" >
                    </div>

                    <button class="btn btn-primary" type="button" v-on:click="foundRecord()">Поиск</button>

                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Клиент</th>
                    <th scope="col">Торговая точка</th>
                    <th scope="col">Склад</th>
                    <th scope="col">Сумма</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RaslistComponent",
        data() {
            return {
                data1:null,
                data2:null,
            }
        }
    }

</script>

<style scoped>

</style>
