import {
  ScrollView,
  StyleSheet,
  Text,
  TouchableOpacity,
  View,
} from "react-native";
import { Dispatch, FC, SetStateAction, useState } from "react";

import { format, sub } from "date-fns";
import Icon from "react-native-vector-icons/FontAwesome";
import { DateTimePickerAndroid } from "@react-native-community/datetimepicker";

import { PostMedia as PostMediaTypes } from "../../types";
import PostMedia from "../PostMedia";
import fetchApi from "../../utils/fetch";
import generalStyle from "../../styles/styles";

const FiveDaysAgoMedia: FC<{
  postMedia?: PostMediaTypes[];
  setPostMedia?: Dispatch<SetStateAction<PostMediaTypes[]>>;
  setTodayMedia?: Dispatch<SetStateAction<PostMediaTypes>>;
}> = ({ postMedia, setPostMedia, setTodayMedia }) => {
  const [date, setDate] = useState(new Date());

  const onChange = async (event: any, selectedDate: any) => {
    const currentDate = selectedDate;

    if (currentDate !== date) {
      const searchDate = format(selectedDate, "yyyy-MM-dd");
      const searchRes = await fetchApi(`&date=${searchDate}`);
      if (setTodayMedia !== undefined) setTodayMedia(searchRes);
    }

    setDate(currentDate);
  };

  const showMode = () => {
    DateTimePickerAndroid.open({
      value: date,
      onChange,
      mode: "date",
      is24Hour: true,
    });
  };

  const handleLoadMore = async () => {
    if (postMedia !== undefined && setPostMedia !== undefined) {
      const lastDay = postMedia[postMedia.length - 1].date;
      let dayAfterLast = undefined;
      let newDate = undefined;

      if (lastDay !== undefined)
        dayAfterLast = format(sub(lastDay, { days: 0 }), "yyyy-MM-dd");

      if (dayAfterLast !== undefined)
        newDate = format(sub(dayAfterLast, { days: 3 }), "yyyy-MM-dd");

      const fiveDaysAgoMediaRes = await fetchApi(
        `&start_date=${newDate}&end_date=${dayAfterLast}`
      );

      const daysAfterMedia = [...postMedia, ...fiveDaysAgoMediaRes.reverse()];

      setPostMedia(daysAfterMedia);
    }
  };

  return (
    <View style={style.container}>
      <View style={style.header}>
        <Text style={[generalStyle.date, generalStyle.text]}>
          Últimos 5 días
        </Text>
        <View style={style.dateSearchContainer}>
          <TouchableOpacity onPress={showMode} style={style.dateSearchText}>
            <Text style={[generalStyle.date, generalStyle.text]}>
              {format(date, "yyyy-MM-dd")}
            </Text>
          </TouchableOpacity>
        </View>
      </View>
      <ScrollView style={style.content}>
        {postMedia?.map((post) => (
          <PostMedia key={`post-media-${post.title}`} post={post} />
        ))}
        <View style={generalStyle.centerContainer}>
          <TouchableOpacity
            style={[style.loadMoreButton, generalStyle.centerContainer]}
            onPress={handleLoadMore}
          >
            <View>
              <Icon name="refresh" size={15} color="#ffffffaa" />
            </View>
            <Text style={style.loadMoreText}>Cargar más</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </View>
  );
};

const style = StyleSheet.create({
  container: { flex: 1, marginVertical: 15 },
  header: {
    flexDirection: "row",
    alignItems: "flex-end",
    justifyContent: "space-between",
    marginBottom: 15,
  },
  dateSearchContainer: { flexDirection: "row" },
  dateSearchText: { fontSize: 20, marginHorizontal: 10, color: "#fff" },
  content: { paddingHorizontal: 5 },
  loadMoreButton: {
    flexDirection: "row",
    borderRadius: 10,
    paddingHorizontal: 10,
    height: 35,
  },
  loadMoreText: {
    fontSize: 16,
    color: "#ffffffaa",
    paddingLeft: 5,
  },
});

export default FiveDaysAgoMedia;
