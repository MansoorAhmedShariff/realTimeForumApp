<template>
<v-hover>
            <v-card color="teal darken-3"
            slot-scope="{ hover }"
            :class="`elevation-${hover ? 24 : 2}`"
            class="white--text"
            style="position: relative">
              <v-layout>
                <v-flex>
                  <v-card-title primary-title>
                    <div>
                      <div class="headline">{{question.title}}</div>
                      <div class="grey--text">{{question.created_at}}</div>
                    </div>
                  </v-card-title>
                  <v-card-text>
                    <div>{{question.body}}</div>
                  </v-card-text>
                </v-flex>
              <v-btn fab dark small color="red darken-1"
                absolute
                bottom
                right
                :to="question.path"
                class="mb-1">
                  <v-icon>keyboard_arrow_right</v-icon>
            </v-btn>
              </v-layout>
              
            </v-card>
</v-hover>
</template>

<script>
export default {
    props:['question']
}
</script>

<style>

</style>
