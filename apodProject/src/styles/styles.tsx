import { StyleSheet } from "react-native";

const generalStyle = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#071a5d",
    paddingHorizontal: 16,
  },
  content: {
    backgroundColor: "#2c449d",
    marginVertical: 20,
    borderRadius: 16,
    padding: 16,
  },
  title: { fontSize: 20, marginVertical: 10, fontWeight: "bold" },
  date: { fontSize: 16 },
  text: { color: "#fff" },
  centerContainer: { justifyContent: "center", alignItems: "center" },
});

export default generalStyle;
