import { StyleSheet, View } from "react-native";
import Routes from "./src/routes";

export default function App() {
  return (
    <View style={styles.container}>
      <Routes />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#071a5d",
    paddingTop: "10%"
  },
});
