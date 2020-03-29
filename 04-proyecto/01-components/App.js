import React from 'react';
import { StyleSheet, Text, View } from 'react-native';

export default function App() {
  return (
    <View style={styles.container} >
      <View style={styles.box1}>
        <Text style={styles.text}> vista 1 </Text>
      </View>
      <View style={styles.box2}>
        <Text style={styles.text}> vista 2 </Text>
      </View>
      <View style={styles.box3}>
        <Text style={styles.text}> vista 3 </Text>
      </View>



    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
   flexDirection:'column'
  },
  text: {
    color: "#ff1744"
  },
  box1: {
    flex: 1,
    backgroundColor: '#FFA000'
  },
  box2: {
    flex: 1,
    backgroundColor: '#536DFE'
  },
  box3: {
    flex: 1,
    backgroundColor: '#D32F2F'
  }
});
