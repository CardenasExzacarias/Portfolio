import { View } from "react-native";
import { useEffect, useState } from "react";

import { format, sub } from "date-fns";

import fetchApi from "../../utils/fetch";
import TodayMedia from "../../components/TodayMedia";
import { PostMedia } from "../../types";
import FiveDaysAgoMedia from "../../components/FiveDaysAgoMedia";
import generalStyle from "../../styles/styles";

const Home = () => {
  const [todayMedia, setTodayMedia] = useState<PostMedia>({});
  const [fiveDaysAgoMedia, setFiveDaysAgoMedia] = useState<PostMedia[]>([]);

  useEffect(() => {
    const loadTodayImage = async () => {
      try {
        const todayMediaRes = await fetchApi();
        setTodayMedia(todayMediaRes);
      } catch (error) {
        console.error(error);
        setTodayMedia({});
      }
    };

    const loadLastFiveDaysMedia = async () => {
      try {
        const passDate = new Date(Date.now() - 86400000);

        const yasterday = format(passDate, "yyyy-MM-dd");

        const fiveDaysAgo = format(sub(yasterday, { days: 3 }), "yyyy-MM-dd");

        const fiveDaysAgoMediaRes = await fetchApi(
          `&start_date=${fiveDaysAgo}&end_date=${yasterday}`
        );

        setFiveDaysAgoMedia(fiveDaysAgoMediaRes.reverse());
      } catch (error) {
        console.error(error);
      }
    };

    loadTodayImage().catch(null);
    loadLastFiveDaysMedia().catch(null);
  }, []);

  return (
    <View style={generalStyle.container}>
      <TodayMedia {...todayMedia} />
      <FiveDaysAgoMedia
        postMedia={fiveDaysAgoMedia}
        setPostMedia={setFiveDaysAgoMedia}
        setTodayMedia={setTodayMedia}
      />
    </View>
  );
};

export default Home;
