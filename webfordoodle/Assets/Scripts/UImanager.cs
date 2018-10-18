using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class UImanager : MonoBehaviour {
	
	[SerializeField]
	Text gameovertext;

	[SerializeField]
	Text scoretext;

	[SerializeField]
	GameObject startbutton;

    
    public string path = "http://www.meifinalproject.lionfree.net/RandingfordoodlejumpUpdate.php";
    public string downloadPath = "http://localhost/Unity/RankingDownloadfordoodlejump.php";
    public string checkuserPath = "http://localhost/Unity/rankingfordoodlejumpuserlogin.php";

    public string name;
    public string score;

    void OnGUI()
    {
        name = GUI.TextField(new Rect(100, 30, 100, 30), name);
        score = GUI.TextField(new Rect(100, 60, 100, 30), score);
        if (GUI.Button(new Rect(100, 90, 100, 30), "Upload"))
        {
            StartCoroutine("ScoreUpdate");
        }

    }

    public IEnumerator usernamedatatake()
    {
        WWWForm form = new WWWForm();

        WWW th = new WWW(checkuserPath, form);

        yield return th;

        Debug.Log(th.text);

        name = th.text;
        

    }

    public IEnumerator ScoreUpdate()
    {
        WWWForm form = new WWWForm();

        Dictionary<string, string> data = new Dictionary<string, string>();
        data.Add("name", name);
        data.Add("score", score);

        foreach (KeyValuePair<string, string> post in data)
        {
            form.AddField(post.Key, post.Value);
        }

        WWW www = new WWW(path, form);

        yield return www;

        Debug.Log(www.text);

    }

    public void showscoretext(int _score){
        score = _score.ToString();
		scoretext.text = "Score: " + _score.ToString ();
	}

	public void gameend(){
		startbutton.SetActive (true);
		gameovertext.gameObject.SetActive(true);
    }

	public void gamestart(){
		scoretext.gameObject.SetActive (true);
		startbutton.SetActive (false);
		gameovertext.gameObject.SetActive (false);
        StartCoroutine(usernamedatatake());
    }


}
