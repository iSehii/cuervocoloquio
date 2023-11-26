import React from 'react';
import { View, StyleSheet } from 'react-native';
import { WebView } from 'react-native-webview';
import Icon from 'react-native-vector-icons/MaterialIcons';

const Header = () => {
  return (
    <View style={styles.header}>
      <Icon name="menu" size={30} color="#000" />
    </View>
  );
};

const App = () => {
  return (
    <View style={styles.container}>
      <Header />
      <WebView
        source={{ uri: 'http://192.168.15.250' }}
        javaScriptEnabled={true}
        showsVerticalScrollIndicator={false} 
        showsHorizontalScrollIndicator={false}
        style={styles.webview}
        renderHeader={() => <Header />}
      />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  header: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    paddingHorizontal: 20,
    height: 56,
    marginTop: -56,
    paddingVertical: 10,
    borderBottomWidth: 2,
    borderBottomColor: 'rgb(0, 55, 255)',
    backgroundColor: 'rgb(255, 255, 255)',
  },
  webview: {
    marginLeft: -1,
    marginTop: 0,
    flex: 1,
  },
});

export default App;
