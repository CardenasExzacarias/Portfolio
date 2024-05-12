import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";
import { NativeStackNavigationOptions } from "@react-navigation/native-stack";

import { RootStackParams } from "../types";
import Home from "../screens/Home";
import Details from "../screens/Details";
import React from "react";
import Header from "../components/Header";

const Stack = createNativeStackNavigator<RootStackParams>();
const homeName = "Home";
const homeTitle = "Explora";
const detailsName = "Details";
const detailsTitle = "Detalles";

const routeScreenDefaultOptions = (
  title: string,
  Header?: React.ComponentType<any>
): NativeStackNavigationOptions => {
  let options: NativeStackNavigationOptions = {
    headerStyle: { backgroundColor: "#071a5d" },
    headerTitleStyle: { color: "#fff" },
    title: title,
    headerTintColor: "#fff",
  };

  if (Header) options.header = () => <Header />;

  return options;
};

const Routes = () => (
  <NavigationContainer>
    <Stack.Navigator initialRouteName="Home">
      <Stack.Screen
        name={homeName}
        component={Home}
        options={routeScreenDefaultOptions(homeTitle, Header)}
      />
      <Stack.Screen
        name={detailsName}
        component={Details}
        options={routeScreenDefaultOptions(detailsTitle)}
      />
    </Stack.Navigator>
  </NavigationContainer>
);

export default Routes;
