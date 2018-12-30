<template>
<v-container fluid>
<v-card color="teal darken-3"
            class="white--text"
            style="position: relative">
              <v-layout>
                <v-flex>
                  <v-card-title primary-title>
                    <div>
                      <div class="headline">{{question.title}}</div>
                      <div class="grey--text">{{question.user}} said {{question.created_at}}</div>
                    </div>
                  </v-card-title>
                  <v-card-text>
                    <div>{{question.body}}</div>
                  </v-card-text>
                </v-flex>
              <v-btn dark color="red darken-1"
                absolute
                bottom
                right
                class="mb-1">
                  ... Replies
            </v-btn>
              </v-layout>
              
            </v-card>
    </v-container>
</template>

<script>
export default {
    props:['question']
}
</script>

<style>

</style>
