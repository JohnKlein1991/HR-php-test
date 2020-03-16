<template>
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h2 class="display-6">Погода в Брянске</h2>
            <p v-if="weatherData.icon_uri" class="lead">
                <img :src="weatherData.icon_uri" alt="weather_icon">
            </p>
            <p v-if="weatherData.current_temp" class="lead">
                Температура: {{ weatherData.current_temp }}°C
            </p>
            <p v-if="weatherData.current_temp" class="lead">
                Ощущается: {{ weatherData.feels_like_temp }}°C
            </p>
            <p v-if="weatherData.pressure" class="lead">
                Давление: {{ weatherData.pressure }} мм рт. ст.
            </p>
        </div>
    </div>
</template>

<script>
    const cityName = 'bryansk';
    // коэффициент для перевода давления из паскалей в ммрс
    const mmhgСoefficient = 0.750062;
    export default {
        mounted() {
            this.getWeatherByCityName();
        },
        data() {
            return {
                weatherData: {
                    icon_uri: null,
                    current_temp: null,
                    feels_like_temp: null,
                    pressure: null,
                },
            }
        },
        methods: {
            getWeatherByCityName() {
                this.axios.get(`/weather/get-by-city/${cityName}`)
                    .then(response => {
                        console.log(response.data);
                        this.weatherData.icon_uri = response.data.icon_uri;
                        this.weatherData.current_temp = response.data.current_temp;
                        this.weatherData.feels_like_temp = response.data.feels_like_temp;
                        this.weatherData.pressure = Math.round(response.data.pressure * mmhgСoefficient);
                    });
            }
        }
    }
</script>

