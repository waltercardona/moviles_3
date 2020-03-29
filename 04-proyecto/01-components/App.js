import React from 'react';
import { StyleSheet, Text, View, Image } from 'react-native';

export default function App() {
  return (
    <View style={styles.container} >
      <View style={styles.box1}>
        <View style={styles.box3}></View>
        <View style={styles.box4}></View>
      </View>
      <View style={styles.box2}>
        <View style={styles.box5}></View>
        <View style={styles.box6}></View>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    flexDirection: 'column'
  },
  text: {
    color: "#ff1744"
  },
  text1: {
    color: "#000"
  },
  box1: {
    flex: 1,
    backgroundColor: '#FFA000',
    flexDirection: 'row'
  },
  box2: {
    flex: 1,
    backgroundColor: '#F57C00',
    flexDirection: 'row'
   
  },
  box3: {
    flex: 1,
    backgroundColor: '#FFA000',
    justifyContent: 'space-around'
  },
  box4: {
    flex: 1,
    backgroundColor: '#448AFF',
    justifyContent: 'space-around'
  },
  box5: {
    flex: 1,
    backgroundColor: '#D32F2F',
    justifyContent: 'space-around'
  },
  box6: {
    flex: 1,
    backgroundColor: '#fff',
    justifyContent: 'space-around'
  },
});
