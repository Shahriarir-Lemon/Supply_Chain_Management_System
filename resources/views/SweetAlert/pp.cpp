#include <iostream>
#include <string>

using namespace std;

class YouTubeChannel {
private:
    string channelName;
    string channelId;
    string channelOwner;
    int subscriberCount;
    static const int maxVideos = 10;
    string videoTitles[maxVideos];

public:
    YouTubeChannel(string name, string id, string owner)
        : channelName(name), channelId(id), channelOwner(owner), subscriberCount(0) {}

    string getChannelName() const {
        return channelName;
    }

    string getChannelId() const {
        return channelId;
    }

    string getChannelOwner() const {
        return channelOwner;
    }

    int getSubscriberCount() const {
        return subscriberCount;
    }

    void addVideo(string videoTitle) {
        if (subscriberCount > 0 && subscriberCount <= maxVideos) {
            videoTitles[subscriberCount - 1] = videoTitle;
        }
    }

    void subscribe() {
        subscriberCount++;
    }

    void unsubscribe() {
        if (subscriberCount > 0) {
            subscriberCount--;
        }
    }

    const string* getVideoTitles() const {
        return videoTitles;
    }

    // Public method to get the maximum number of videos
    static int getMaxVideos() {
        return maxVideos;
    }
};

class User {
private:
    static const int maxSubscribedChannels = 10;
    YouTubeChannel* subscriptionList[maxSubscribedChannels];
    int numSubscribedChannels;

public:
    User() : numSubscribedChannels(0) {}

    void subscribeToChannel(YouTubeChannel& channel) {
        if (numSubscribedChannels < maxSubscribedChannels) {
            channel.subscribe();
            subscriptionList[numSubscribedChannels++] = &channel;
        } else {
            cout << "Cannot subscribe. Maximum limit reached.\n";
        }
    }

    void unsubscribeFromChannel(YouTubeChannel& channel) {
        for (int i = 0; i < numSubscribedChannels; ++i) {
            if (subscriptionList[i]->getChannelId() == channel.getChannelId()) {
                channel.unsubscribe();
                for (int j = i; j < numSubscribedChannels - 1; ++j) {
                    subscriptionList[j] = subscriptionList[j + 1];
                }
                numSubscribedChannels--;
                cout << "Unsubscribed successfully.\n";
                return;
            }
        }
        cout << "Channel not found in the subscription list.\n";
    }

    void displaySubscribedChannels() const {
        cout << "Subscribed Channels:\n";
        for (int i = 0; i < numSubscribedChannels; ++i) {
            const auto& channel = *subscriptionList[i];
            cout << "Channel Name: " << channel.getChannelName() << "\n";
            cout << "Channel ID: " << channel.getChannelId() << "\n";
            cout << "Channel Owner: " << channel.getChannelOwner() << "\n";
            cout << "Subscriber Count: " << channel.getSubscriberCount() << "\n";
            cout << "Videos:\n";
            const auto& videoTitles = channel.getVideoTitles();
            for (int j = 0; j < YouTubeChannel::getMaxVideos(); ++j) {
                if (!videoTitles[j].empty()) {
                    cout << "  - " << videoTitles[j] << "\n";
                }
            }
            cout << "\n";
        }
    }
};

int main() {
    YouTubeChannel cookingChannel("Cooking with Chef", "UC123", "ChefJohn");
    cookingChannel.addVideo("How to Make Pasta");
    cookingChannel.addVideo("Baking 101");

    YouTubeChannel sportsChannel("Sports Highlights", "UC456", "SportsFanatic");
    sportsChannel.addVideo("Best Goals of the Year");
    sportsChannel.addVideo("NBA Finals Recap");

    User user;

    char choice;
    do {
        cout << "1. Subscribe to a channel\n";
        cout << "2. Unsubscribe from a channel\n";
        cout << "3. Display subscribed channels\n";
        cout << "4. Exit\n";
        cout << "Enter your choice: ";
        cin >> choice;

        switch (choice) {
            case '1': {
                cout << "Enter channel name to subscribe: ";
                string channelName;
                cin.ignore();  // Clear the input buffer
                getline(cin, channelName);
                if (channelName == "Cooking with Chef") {
                    user.subscribeToChannel(cookingChannel);
                } else if (channelName == "Sports Highlights") {
                    user.subscribeToChannel(sportsChannel);
                } else {
                    cout << "Invalid channel name.\n";
                }
                break;
            }
            case '2': {
                cout << "Enter channel name to unsubscribe: ";
                string channelName;
                cin.ignore();  // Clear the input buffer
                getline(cin, channelName);
                if (channelName == "Cooking with Chef") {
                    user.unsubscribeFromChannel(cookingChannel);
                } else if (channelName == "Sports Highlights") {
                    user.unsubscribeFromChannel(sportsChannel);
                } else {
                    cout << "Invalid channel name.\n";
                }
                break;
            }
            case '3':
                user.displaySubscribedChannels();
                break;
            case '4':
                cout << "Exiting program.\n";
                break;
            default:
                cout << "Invalid choice. Please try again.\n";
        }
    } while (choice != '4');

    return 0;
}
