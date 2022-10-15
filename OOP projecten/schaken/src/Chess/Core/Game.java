package Chess.Core;

import Chess.Core.StateAnalysers.CheckAnalyser;
import Chess.Core.StateAnalysers.CheckmateAnalyser;
import Chess.Core.StateAnalysers.StalemateAnalyser;
import Chess.Core.StateAnalysers.StateAnalyser;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

public class Game
{
    private Color turn;
    private State state;
    private Board board;
    private HashSet<StateAnalyser> analysers;
    private PromotionHandler promotionHandler;

    public Game(PromotionHandler promotionHandler) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        turn = Color.white;
        board = new Board();
        reset();
        this.analysers = new HashSet<>();
        this.analysers.add(new CheckAnalyser());
        this.analysers.add(new StalemateAnalyser());
        this.analysers.add(new CheckmateAnalyser());
        this.promotionHandler = promotionHandler;
    }

    public Color getTurn()
    {
        return turn;
    }

    public void setTurn(Color turn)
    {
        this.turn = turn;
    }

    public State getState()
    {
        return state;
    }

    public void setState(State state)
    {
        this.state = state;
    }

    public Board getBoard()
    {
        return board;
    }

    public void setBoard(Board board)
    {
        this.board = board;
    }

    public HashSet<StateAnalyser> getAnalysers()
    {
        return analysers;
    }

    public void setAnalysers(HashSet<StateAnalyser> analysers)
    {
        this.analysers = analysers;
    }

    public void reset() throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        this.board.reset(promotionHandler);
        this.state = State.active;
    }

    public void nextTurn() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        if(this.turn == Color.black)
            this.turn = Color.white;
        else
            this.turn = Color.black;

        State newState;
        for(StateAnalyser analyser : this.analysers)
        {
            newState = analyser.analyse(this.state, this.board, this.turn);
            if(this.state != newState)
            {
                this.state = newState;
                break;
            }
        }
    }
}